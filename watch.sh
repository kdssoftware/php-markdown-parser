#!/bin/bash
watch -n 1 "git pull && git add ./* && git stage ./* &&git commit -m 'update' && git push"
#RewriteRule ^https:\/\/ilt\.kuleuven\.be\/php72\/docs\/(.*)$ https://ilt.kuleuven.be/php72/docs/?p=$1 [R=301,NC,L]