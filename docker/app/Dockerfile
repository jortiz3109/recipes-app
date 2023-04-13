FROM debian

LABEL maintainer="John Edisson Ortiz"

ARG NODE_VERSION=19

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt update
RUN apt -y upgrade
RUN apt install -y --no-install-recommends lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 curl apt-utils

RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list
RUN curl -fsSL  https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /etc/apt/trusted.gpg.d/sury-keyring.gpg
RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash -

RUN apt update
RUN apt install -y --no-install-recommends php8.2 php8.2-cli \
        php8.2-curl php8.2-mysql php8.2-mbstring  \
        php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
        php8.2-intl php8.2-readline php8.2-redis php8.2-xdebug \
        php8.2-gd php8.2-bz2 nodejs mariadb-client

RUN npm install -g --ignore-scripts npm
RUN npm install -g --ignore-scripts pnpm

RUN apt-get -y autoremove
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN useradd -ms /bin/bash --no-user-group -u 1000 app
RUN mkdir -p /home/app/.composer
RUN chown -R app /home/app/.composer

WORKDIR /var/www/html

USER app
