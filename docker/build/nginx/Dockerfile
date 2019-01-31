FROM nginx:1.15-alpine

COPY default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /www

VOLUME ["/www"]

EXPOSE 80