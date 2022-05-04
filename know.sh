#!/bin/bash

source core.sh

################################################################################

readthedocs () {
    echo $*
}

################################################################################

mainloop () {
    case $1 in
        jquery-ui)
            ensure_repo "github.com:jquery/jqueryui.com" $TARGET/git/$1
            ;;
        bootstrap)
            ensure_repo "github.com:twbs/bootstrap" $TARGET/git/$1
            ;;
        vuejs)
            ensure_repo "github.com:vuejs/vuejs.org" $TARGET/git/$1
            ;;
        #***********************************************************************
        react-native-website)
            ensure_repo "github.com:facebook/react-native-website" $TARGET/git/$1
            ;;
        react-native-navigation)
            ensure_repo "github.com:react-navigation/react-navigation.github.io" $TARGET/git/$1
            ;;
        react-native-reanimated)
            ensure_repo "github.com:software-mansion/react-native-reanimated" $TARGET/git/$1
            ;;
        #***********************************************************************
        android-sdk)
            ;;
        expo-sdk)
            ensure_repo "github.com:rauldeheer/expo-docs" $TARGET/git/$1
            ;;
        parse-sdk)
            ;;
        #***********************************************************************
        flutter)
            ;;
        react-native)
            for key in $(echo react-native-{website,navigation,reanimated}) ; do
                mainloop $key
            done
            ;;
        #***********************************************************************
        nodejs)
            ;;
        python)
            readthedocs $(cat $TARGET/lst/python.txt)
            ;;
        django)
            readthedocs $(cat $TARGET/lst/django.txt)
            ;;
        #***********************************************************************
        web)
            for key in jquery-ui bootstrap vuejs ; do
                mainloop $key
            done
            readthedocs rete=latest
            ;;
        mob)
            for key in $(echo react-native flutter {android,expo,parse}-sdk) ; do
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
        off)
            ensure_repo "github.com:freeCodeCamp/devdocs" $TARGET/off

            sudo -H -- gem install bundler -v 2.1.4

            bundle install
            bundle exec thor docs:download --default
            bundle exec rackup
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

################################################################################

mainloop $*

