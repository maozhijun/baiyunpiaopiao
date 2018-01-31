#!/bin/bash

if [ ! -n "$1" ] ;then  
    echo "请输入参数：class|conf|tools|all"
else  
    scp -r $1 root@47.89.251.204:/data/app/encodes/
fi  



