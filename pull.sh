#!/bin/bash

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

mainloop () {
    case $1 in
        #***********************************************************************
        image)
            mainloop iso
            mainloop jar
            mainloop pxe
            mainloop vhd
            ;;
        iso)
            ensure_fold $NEUROX/lobe/iso

            wget -c
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
        pxe)
            ensure_fold $NEUROX/ipxe

            wget -c netboot.xyz.iso
            wget -c rancheros.ipxe
            ;;
        usb)
            ensure_fold $NEUROX/lobe/usb

            wget -c memtest86-usb.zip
            wget -c FD13-LegacyCD.zip
            wget -c FD13-BonusCD.zip
            wget -c FD13-LiveCD.zip
            ;;
        vhd)
            ensure_fold $NEUROX/lobe/vhd/vbox

            wget -c IE11.Win7.Vagrant.zip
            wget -c MSEdge.Win10.Vagrant.zip
            ;;
        #***********************************************************************
        brain)
            mainloop hdt
            mainloop eye
            mainloop nlp
            ;;
        hdt)
            ensure_fold $NEUROX/lobe/hdt

            wget -c swdf-2012-11-28.hdt
            wget -c wordnet-2013-03-20.hdt
            wget -c wordnet31.hdt
            wget -c dblp-20170124.hdt{.index.v1-1,}
            ;;
        eye)
            mainloop tfjs
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
        nlp)
            mainloop core
            mainloop nltk
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
        #***********************************************************************
        all|main|every)
            mainloop brain
            mainloop coder
            ;;
        *)
            echo Unknown directive : $*
            ;;
    esac
}

mainloop $*
