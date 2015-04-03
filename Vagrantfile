# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "utopic-cloud"
  config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/utopic/current/utopic-server-cloudimg-amd64-vagrant-disk1.box"

  config.vm.network "private_network", ip: "192.168.22.2"
  config.vm.hostname = "ubuntu"
  config.vm.provision :shell, :path => "provision/bootstrap.sh"
  config.vm.synced_folder ".", "/var/www"
  config.vm.synced_folder ".", "/vagrant"
end
