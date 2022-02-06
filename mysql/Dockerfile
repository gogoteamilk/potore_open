FROM mariadb:10.4

RUN apt update \
    && apt install -y mariadb-plugin-mroonga \
    && apt clean \
    && rm -rf /var/lib/apt/lists/*
RUN cp /usr/share/mysql/mroonga/install.sql /docker-entrypoint-initdb.d