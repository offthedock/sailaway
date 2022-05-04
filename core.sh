#!/bin/bash

export SOURCE=MULTIBOOT

export TARGET=/media/$USER/$SOURCE

################################################################################

ensure_fold () {
    mkdir -p $1

    cd $1
}

ensure_link () {
    if [[ ! -d $SOURCE/$1 ]] ; then
        ensure_repo $1 $SOURCE/$1
    fi

    if [[ ! -e $TARGET/$2 ]] ; then
        ln -sf $SOURCE/$1 $TARGET/$2
    fi
}

################################################################################

ensure_repo () {
    if [[ ! -d $2 ]] ; then
        git clone git@$1.git $2
    fi
}

################################################################################


