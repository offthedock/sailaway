#!/bin/bash

export SOURCE=/git/fossil
export NEUROX=/git/neurox
export TARGET=/git/coding

export MAPPER="python nodejs php"
#export MAPPER="python nodejs php ruby java dotnet"
export REDUCE="abstract library framework operating platform"

################################################################################

export framework_python="flask django scrapy airflow"
export framework_nodejs="express hubot leveldb parse"
export framework_php="laravel wordpress"

#export framework_java=""
#export framework_ruby=""
#export framework_dotnet=""

export modular_abstract="cloud dataset filesystem network operating runtime vocabular"
export modular_library="autobahn graphql linguist mosquitto"
export modular_operating="android chrome linux macos windows"
export modular_platform="hardkernel raspberrypi"

################################################################################

ensure_fold () {
    mkdir -p $1

    cd $1
}

ensure_repo () {
    if [[ ! -d $2 ]] ; then
        git clone git@bitbucket.org:$1.git $2
    fi
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

for x in $MAPPER ; do
    mkdir -p $TARGET/${x}

    export modular_framework=$(bash -c "echo \$framework_${x}")

    ensure_link ${x}2use/framework ${x}/baseline

    for y in $REDUCE ; do
        mkdir -p $TARGET/${x}/${y}

        for z in $(bash -c "echo \$modular_${y}") ; do
            ensure_link ${z}2use/library4${x} ${x}/${y}/${z}
        done
    done
done
