#!/bin/bash

################################################################################

ensure_fold () {
    mkdir -p $1

    cd $1
}

ensure_repo () {
    if [[ ! -d $2 ]] ; then
        git clone git@$1.git $2
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

export TARGET=/media/$USER/OffTheDock

mainloop () {
    case $1 in
        jquery-ui)
            ensure_repo "github.com:jquery/jqueryui.com" $TARGET/rtfd/git/$1
            ;;
        bootstrap)
            ensure_repo "github.com:twbs/bootstrap" $TARGET/rtfd/git/$1
            ;;
        vuejs)
            ensure_repo "github.com:vuejs/vuejs.org" $TARGET/rtfd/git/$1
            ;;
        #***********************************************************************
        react-native-website)
            ensure_repo "github.com:facebook/react-native-website" $TARGET/rtfd/git/$1
            ;;
        react-native-navigation)
            ensure_repo "github.com:react-navigation/react-navigation.github.io" $TARGET/rtfd/git/$1
            ;;
        react-native-reanimated)
            ensure_repo "github.com:software-mansion/react-native-reanimated" $TARGET/rtfd/git/$1
            ;;
        #***********************************************************************
        android-sdk)
            ;;
        expo-sdk)
            ensure_repo "github.com:rauldeheer/expo-docs" $TARGET/rtfd/git/$1
            ;;
        parse-sdk)
            ;;
        #***********************************************************************
        flutter)
            ;;
        react-native)
            ;;
        #***********************************************************************
        nodejs)
            ;;
        python)
            mainloop "rtd" $(cat $TARGET/rtfd/lst/python.txt)
            ;;
        django)
            mainloop "rtd" $(cat $TARGET/rtfd/lst/django.txt)
            ;;
        #***********************************************************************
        web)
            for key in jquery-ui bootstrap vuejs ; do
                mainloop $key
            done
            mainloop "rtd" rete=latest
            ;;
        mob)
            for key in $(echo react-native-{website,navigation,reanimated} flutter {android,expo,parse}-sdk) ; do
                mainloop $key
            done
            ;;
        app)
            for key in nodejs python django ; do
                mainloop $key
            done
            ;;
        iot)
            for key in ipfs ; do
                mainloop $key
            done
            ;;
        #***********************************************************************
        rtd)
            python tool.py $*
            ;;
        #***********************************************************************
        all|main|every)
            mainloop web
            mainloop mob
            ;;
        *)
            echo Unknown directive : $*
            ;;
    esac
}

mainloop $*
