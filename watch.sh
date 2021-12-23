#!/bin/bash
watch -n 1 "git pull && git add ./* && git stage ./* &&git commit -m 'update' && git push"