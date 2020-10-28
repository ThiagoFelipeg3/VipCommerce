#!/bin/bash
set -e #interrompe se houver erros
function run {
    COLUMNS=$(tput cols)
    title=$1
    printf "\n\n\n"
    printf '%*s\n' "${COLUMNS:-$(tput cols)}" '' | tr ' ' -
    printf "%*s\n" $(((${#title}+$COLUMNS)/2)) "$title"
    printf '%*s\n' "${COLUMNS:-$(tput cols)}" '' | tr ' ' -
    eval $1
}