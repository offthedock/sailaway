#!/bin/bash

source core.sh

################################################################################

DISK=$1

if [[ "x$DISK" == "x" ]] ; then
    DISK=/dev/sdb
fi

################################################################################

MEMO=$2

if [[ "x$MEMO" == "x" ]] ; then
    MEMO=2G
fi

################################################################################

ARCH=$2

if [[ "x$ARCH" == "x" ]] ; then
    ARCH=$(uname -m)
fi

################################################################################

OPTs="-enable-kvm -rtc base=localtime"
OPTs="${OPTs} -m ${MEMO} -vga std"
OPTs="${OPTs} -drive file=${DISK},readonly,cache=none,format=raw,if=virtio"

sudo qemu-system-$ARCH $OPTs

