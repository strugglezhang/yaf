#! /usr/bin/python

# -*- coding: utf-8 -*-
import yaml
from string import Template
import os
import commands
import sys

opp_dir_path =os.path.dirname(os.path.realpath(__file__))
abs_dir_path = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

def get_diy_conf(data,env):
    global diy_conf
    diy_conf = data['diy'][env]

def get_env_conf(data,env):
    global env_conf
    env_conf = data['env'][env]

def get_yaml_data(yaml_file):
    file = open(yaml_file, 'r')
    file_data = file.read()
    file.close()
    data = yaml.load(file_data,Loader=yaml.FullLoader)
    return data


def read_template(data):
    file_dir = "../conf/options/"
    for root, dirs, files in os.walk(file_dir):
        for item in files :
            content = open(file_dir + item,'r')
            temp = content.read()
            if temp != '' :
                t = Template(temp)
                tmp = t.safe_substitute(diy_conf)
                gen_template(item,tmp)


def gen_template(item,content):
    file_dir = "../conf/used/"
    file_name = item.replace("tpl",diy_conf['PRJ_NAME'])
    f = file(file_dir + file_name,'w')
    f.write(content)
    f.close()

def ln():
    c = "ln -sf %s %s" %(abs_dir_path + "/conf/used/*.ini",env_conf['PHP-INI-SCAN'])
    status, output = commands.getstatusoutput(c)
    if status == 0 :
        print "....... ini add success !!"
    d = "ln -sf %s %s" %(abs_dir_path + "/conf/used/*.conf",env_conf['NGINX-CONF-SCAN'])
    status, output = commands.getstatusoutput(d)
    if status == 0 :
        print "....... ngixn.conf add success!!"

def server_reload():
    nginx = env_conf['NGINX'] + " -s reload"
    status, output = commands.getstatusoutput(nginx)
    if status == 0 :
        print "....... nginx -s reload success"

    fpm =  "kill -USR2 `cat " + env_conf['FPM-PID'] + "`"
    status, output = commands.getstatusoutput(nginx)
    if status == 0 :
        print "....... php-fpm reload success"


if __name__ == '__main__':
    env = raw_input("please insert your create env, dev or online ? \r\n")
    if env not in ['dev', 'online'] :
        print "dev not env ,can you write error ?"
        sys.exit()

    data = get_yaml_data(opp_dir_path + "/../_prj/conf.yaml")
    get_diy_conf(data,env)
    get_env_conf(data,env)
    read_template(data)
    ln()
    server_reload()
