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

export TARGET=/git/neurox/help

mainloop () {
    case $1 in
        jquery-ui)
            ensure_repo "github.com:jquery/jqueryui.com" $TARGET/main/$1
            ;;
        bootstrap)
            ensure_repo "github.com:twbs/bootstrap" $TARGET/main/$1
            ;;
        vuejs)
            ensure_repo "github.com:vuejs/vuejs.org" $TARGET/main/$1
            ;;
        #***********************************************************************
        react-native-website)
            ensure_repo "github.com:facebook/react-native-website" $TARGET/main/$1
            ;;
        react-native-navigation)
            ensure_repo "github.com:react-navigation/react-navigation.github.io" $TARGET/main/$1
            ;;
        react-native-reanimated)
            ensure_repo "github.com:software-mansion/react-native-reanimated" $TARGET/main/$1
            ;;
        #***********************************************************************
        android-sdk)
            ;;
        expo-sdk)
            ensure_repo "github.com:rauldeheer/expo-docs" $TARGET/main/$1
            ;;
        parse-sdk)
            ;;
        #***********************************************************************
        nodejs)
            ;;
        python)
            mainloop "rtd" numpy scipy-cookbook
            mainloop "rtd" nltk{-trainer,} owlready2 rdflib sparqlwrapper
            mainloop "rtd" django-{csp,hosts,environ,storages,money} whitenoise
            mainloop "rtd" django-rest-{framework-{json-api,features,datatables},auth,swagger} python-social-auth
            mainloop "rtd" django-{oauth-toolkit,debug-toolbar,import-export,business-logic,datatable-view} channels
            mainloop "rtd" django-{model-utils,reversion,mptt,haystack}
            mainloop "rtd" django-{cms,shop,oscar}
            ;;
        #***********************************************************************
        web)
            for key in jquery-ui bootstrap vuejs ; do
                mainloop $key
            done
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
            for x in $* ; do
                if [[ "x$1" != "x$x" ]] ; then
                    wget -c https://${x}.readthedocs.io/_/downloads/en/stable/htmlzip/ -O $TARGET/rtfd/zip/$x.zip

                    cd $TARGET/rtfd/web

                    unzip -qo $TARGET/rtfd/zip/${x}.zip

                    #wget -c https://${x}.readthedocs.io/_/downloads/en/stable/epub/ -O $TARGET/rtfd/doc/$x.epub
                    wget -c https://${x}.readthedocs.io/_/downloads/en/stable/pdf/  -O $TARGET/rtfd/pdf/$x.pdf
                fi
            done
            ;;
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
