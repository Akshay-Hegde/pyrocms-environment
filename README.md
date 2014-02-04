# PyroCMS Environment

## Install git.subtree

sudo chmod +x /usr/share/doc/git/contrib/subtree/git-subtree.sh

sudo ln -s /usr/share/doc/git/contrib/subtree/git-subtree.sh /usr/lib/git-core/git-subtree

## Grab the Virtual Machine

git remote add -f pyrocms-vm git@github.com:LorenzoGarcia/pyrocms-vm.git

git subtree add --prefix vm pyrocms-vm master --squash

git fetch pyrocms-vm master

git subtree pull --prefix vm pyrocms-vm master --squash

git subtree push --prefix=vm pyrocms-vm master


## Setup the Virtual Machine

set pyrocms-environment/ansible/group_vars/all
