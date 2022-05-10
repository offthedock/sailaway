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

ARCH=$3

if [[ "x$ARCH" == "x" ]] ; then
    ARCH=$(uname -m)
fi

################################################################################

COMM=$4

if [[ "x$COMM" == "x" ]] ; then
    COMM=wlp3s0
fi

#COMM=enp2s0f0

################################################################################

OPTs="-enable-kvm -rtc base=localtime"
OPTs="${OPTs} -m ${MEMO} -vga std"
OPTs="${OPTs} -drive file=${DISK},readonly,cache=none,format=raw,if=virtio"
#OPTs="${OPTs} -netdev bridge,br=${COMM}"

sudo qemu-system-$ARCH $OPTs

