#!/bin/bash

source core.sh

################################################################################

ln -s $TARGET/composer $SOURCE/.cache/composer
ln -s $TARGET/pip      $SOURCE/.cache/pip

ln -s $TARGET/npm      $SOURCE/.npm
ln -s $TARGET/vscode   $SOURCE/.vscode

ln -s $TARGET/expo     $SOURCE/.cache/expo
ln -s $TARGET/yarn     $SOURCE/.cache/yarn

