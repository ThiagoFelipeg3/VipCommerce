#!/bin/bash
#importa funções comuns.
. ./docker/run.sh --source-only
# Inicia projeto Loja 2.0
printf "\n\n\nInstalando o projeto API VipCommerce, vá fazer um café."
run 'composer install'
run 'php artisan migrate'
run 'php artisan key:generate'
run 'php artisan db:seed'
