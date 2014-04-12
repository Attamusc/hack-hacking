echo
echo "Installing some useful things..."
sudo apt-get update
sudo apt-get install -y curl python-software-properties vim

echo
echo "Installing MySQL..."
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get install -y mysql-server

echo
echo "Installing HHVM..."
sudo add-apt-repository ppa:mapnik/boost
wget -O - http://dl.hhvm.com/conf/hhvm.gpg.key | sudo apt-key add -
echo deb http://dl.hhvm.com/ubuntu precise main | sudo tee /etc/apt/sources.list.d/hhvm.list
sudo apt-get update -y
sudo apt-get install -y hhvm
sudo mkdir -p /var/run/hhvm
sudo ln -f -s /vagrant/config/server.ini /etc/hhvm/server.ini
sudo service hhvm restart

echo
echo "Installing Nginx..."
sudo apt-get install -y nginx
sudo ln -f -s /vagrant/config/sites-available /etc/nginx/sites-available/default
sudo service nginx restart

exit
