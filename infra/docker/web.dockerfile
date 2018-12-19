FROM nginx:1.13-alpine

ADD infra/docker/vhost.conf /etc/nginx/conf.d/default.conf