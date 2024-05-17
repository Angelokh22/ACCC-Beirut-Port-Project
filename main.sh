sudo apt update -y
sudo apt install apache2 -y
echo 'ServerName 0.0.0.0' | sudo tee -a /etc/apache2/apache2.conf
sudo apt install mysql-server -y
sudo apt install php libapache2-mod-php php-mysql -y
sudo apt install php-pdo-mysql -y
sudo sed -i 's|/var/www|/workspaces/ACCC-Beirut-Port-Project|g' /etc/apache2/apache2.conf
sudo sed -i 's|/var/www/html|/workspaces/ACCC-Beirut-Port-Project|g' /etc/apache2/sites-available/000-default.conf
sudo update-rc.d apache2 defaults