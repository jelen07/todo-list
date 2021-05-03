#!/usr/bin/env bash

bin/console doctrine:database:drop --force
bin/console doctrine:database:create --if-not-exists
bin/console doctrine:migration:migrate --no-interaction
bin/console doctrine:fixtures:load --no-interaction
