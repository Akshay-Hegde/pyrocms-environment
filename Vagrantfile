VAGRANTFILE_API_VERSION = "2"
IP = "192.168.34.34"

Vagrant.configure("2") do |config|

  # Specifiying The Base Box
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  # Networking Configuration
  config.vm.network "private_network", ip: "192.168.34.34"

  # Shared Folders/Synced Folders/NFS
  config.vm.synced_folder "./", "/vagrant", :group => "www-data"

  # Provisioning
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/site.yml"
    #ansible.inventory_path = "ansible/development"
    #ansible.verbose = "vvvv"
  end

end

# End of file Vagrantfile
