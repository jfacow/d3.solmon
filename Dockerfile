FROM centos/httpd-24-centos7
USER root
ADD . /var/www/html/
WORKDIR /var/www/html/
#RUN yum clean all && yum install --nogpgcheck -y httpd wget curl bash unzip
RUN rm -f /etc/yum.repos.d/centos-sclo-rh /etc/yum.repos.d/centos-sclo-sclo
RUN yum clean all && yum install wget unzip -y
RUN wget -O d3.zip https://github.com/d3/d3/zipball/master && unzip d3.zip -d d3
RUN ls -lah 
RUN pwd
RUN chown -R apache ./*
#RUN service httpd start
CMD ["/usr/sbin/httpd", "-DFOREGROUND"]

