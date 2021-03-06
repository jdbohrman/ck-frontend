#!/usr/bin/env bash

# Go to the install directory.
cd /var/www/html

# Install NPM dependencies.
npm install

# Install composer dependencies.
export COMPOSER_HOME="$HOME/.config/composer/"
composer install --no-interaction --no-dev

# Run NPM
npm run production
