#!/bin/bash

source core.sh

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
    if [[ ! -e $TARGET/$2 ]] ; then
        ln -sf $1 $TARGET/$2
    fi
}

ensure_open () {
    if [[ ! -d $SOURCE/$1 ]] ; then
        ensure_repo $1 $SOURCE/$1
    fi

    ensure_link $SOURCE/$1 $2
}

################################################################################

mainloop () {
    case $1 in
        pxe)
            ensure_fold $NEUROX/ipxe

            wget -c netboot.xyz.iso
            wget -c rancheros.ipxe
            ;;
        #***********************************************************************
        box)
            ensure_fold $NEUROX/virt/box

            wget -c IE11.Win7.Vagrant.zip
            wget -c MSEdge.Win10.Vagrant.zip
            ;;
        esx)
            ensure_fold $NEUROX/virt/esx

            wget -c rancheros-aliyun.vhd
            wget -c rancheros-vmware.vmdk
            ;;
        kvm)
            ensure_fold $NEUROX/virt/kvm

            wget -c rancheros-cloudstack.img
            wget -c rancheros-digitalocean.img
            ;;
        #***********************************************************************
        iso)
            ensure_fold $NEUROX/disk/iso

            wget -c FD13-LegacyCD.zip
            wget -c FD13-BonusCD.zip
            wget -c FD13-LiveCD.zip
            ;;
        mmc)
            ensure_fold $NEUROX/disk/mmc

            wget -c
            ;;
        rom)
            ensure_fold $NEUROX/disk/rom

            wget -c
            ;;
        usb)
            ensure_fold $NEUROX/disk/usb

            wget -c memtest86-usb.zip

            wget -c tails-amd64-4.29.img
            ;;
        #***********************************************************************
        cn5)
            ;;
        hdt)
            ensure_fold $NEUROX/lobe/hdt

            wget -c swdf-2012-11-28.hdt
            wget -c wordnet-2013-03-20.hdt
            wget -c wordnet31.hdt
            wget -c dblp-20170124.hdt{.index.v1-1,}
            ;;
        jar)
            ensure_fold $NEUROX/lobe/jar

            wget -c bimserverjar-1.5.182.jar
            wget -c serposcope-2.13.1.jar

            ensure_fold $NEUROX/lobe/jar/neo4j

            wget -c neosemantics-4.3.0.1.jar

            ensure_fold $NEUROX/lobe/jar/neo4j/graphaware

            wget -c expire-3.5.14.55.4.jar
            ;;
        vcr)
            ;;
        #***********************************************************************
        ant5)
            ;;
        open)
            ;;
        tfjs)
            ensure_fold $NEUROX/lobe/eye/tfjs/ssd_lite/mobilenet_v2

            wget -c https://storage.googleapis.com/tfjs-models/savedmodel/ssdlite_mobilenet_v2/model.json
            wget -c https://storage.googleapis.com/tfjs-models/savedmodel/ssdlite_mobilenet_v2/group1-shard{1,2,3,4,5}of5

            ensure_fold $NEUROX/lobe/eye/tfjs/handpose/detector

            wget -c https://tfhub.dev/mediapipe/tfjs-model/handdetector/1/default/1/model.json?tfjs-format=file
            wget -c https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handdetector/1/default/1/model.json
            wget -c https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handdetector/1/default/1/group1-shard1of2.bin

            ensure_fold $NEUROX/lobe/eye/tfjs/handpose/skeleton

            wget -c https://tfhub.dev/mediapipe/tfjs-model/handskeleton/1/default/1/anchors.json?tfjs-format=file
            wget -c https://tfhub.dev/mediapipe/tfjs-model/handskeleton/1/default/1/model.json?tfjs-format=file
            wget -c https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handskeleton/1/default/1/anchors.json
            wget -c https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handskeleton/1/default/1/model.json
            wget -c https://storage.googleapis.com/tfhub-tfjs-modules/mediapipe/tfjs-model/handskeleton/1/default/1/group1-shard{1,2}of2.bin
            ;;
        vino)
            ;;
        #***********************************************************************
        atom)
            ;;
        glov)
            ;;
        core|corenlp|stanford)
            export STANFORD_VERSION=4.3.0
            export STANFORD_LANGAGE="arabic french english spanish german italian hungarian"

            ensure_fold $NEUROX/lobe/jar/corenlp

            for lang in $STANFORD_LANGAGE ; do
                wget -c https://nlp.stanford.edu/software/stanford-corenlp-${STANFORD_VERSION}-models-${lang}.jar
            done

            ensure_fold $NEUROX/lobe/nlp/core
            ;;
        nltk)
            export NLTK_DATA=$NEUROX/lobe/nlp/nltk

            ensure_fold $NLTK_DATA

            python3 -m nltk.download --all
            ;;
        soul)
            ;;
        text)
            ;;
        #***********************************************************************
        eye)
            mainloop ant5
            mainloop open
            mainloop tfjs
            mainloop vino
            ;;
        nlp)
            mainloop atom
            mainloop core
            mainloop glov
            mainloop open
            mainloop nltk
            mainloop soul
            mainloop text
            ;;
        #***********************************************************************
        off|docs|jade)
            ensure_repo "github.com:offthedock/offthedock" $TARGET/jade

            #ensure_repo "github.com:freeCodeCamp/devdocs" $TARGET/jade

            sudo -H -- gem install bundler -v 2.1.4

            bundle install
            bundle exec thor docs:download --default
            bundle exec rackup
            ;;
        #***********************************************************************
        all|main|every)
            mainloop cn5
            mainloop hdt
            mainloop jar
            mainloop eye
            mainloop nlp
            mainloop vcr

            mainloop iso

            mainloop pxe

            mainloop box
            mainloop esx
            ;;
        *)
            echo Unknown directive : $*
            ;;
    esac
}

mainloop $*

