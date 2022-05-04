#!/bin/sh

logger -t dyndns /etc/dhclient-exit-hooks has been invoked

logger -t dyndns "'$reason' '$interface' '$medium' '$new_ip_address' '$old_ip_address'"

if [ "${old_ip_address}" = "" ]
then
    if [ -e /var/tmp/currentIP ]
    then
        old_ip_address=`/bin/cat /var/tmp/currentIP`
    fi
fi

if [ "$new_ip_address" = "" ] ; then
    new_ip_address=`/sbin/ifconfig fxp0 | /usr/bin/sed -n '/.inet /{s///;s/ .*//;p;}'`
    logger -t dyndns "new IP from ifconfig is ${new_ip_address}"
else
    logger -t dyndns "new IP from dhclient is ${new_ip_address}"
fi

if [ "${new_ip_address}" = "" -o "${new_ip_address}" = "${old_ip_address}" ] ; then
    echo "nochg ${old_ip_address}"
    logger -t dyndns "Ooops, IP has not actually changed from ${old_ip_address}"
else
    /usr/local/bin/curl -v --netrc "https://ipv4.tunnelbroker.net/nic/update?hostname=XXXXX"
    ifconfig gif0 down
    ifconfig gif0 delete
    route delete -inet6 default -interface gif0

    ifconfig gif0 tunnel ${new_ip_address} 209.51.161.14
    ifconfig gif0 inet6 2001:470:1f06:9ea::2 2001:470:1f06:9ea::1 prefixlen 128
    route -n add -inet6 default 2001:470:1f06:9ea::1
    ifconfig gif0 up

    echo "${new_ip_address}" > /var/tmp/currentIP
    logger -t dyndns "updated from ${old_ip_address} to ${new_ip_address}"

fi

logger -t dyndns "all done here"

#.netcrc : machine ipv4.tunnelbroker.net login MYLOGIN       password MYPASSWORD
