# PyroCMS Environment

## Install git.subtree

sudo chmod +x /usr/share/doc/git/contrib/subtree/git-subtree.sh

sudo ln -s /usr/share/doc/git/contrib/subtree/git-subtree.sh /usr/lib/git-core/git-subtree

## Remotes

pyrocms 		git@github.com:pyrocms/pyrocms.git
pyrocms-vm 		git@github.com:LorenzoGarcia/pyrocms-vm.git
pyrocms-streams	git@github.com:LorenzoGarcia/pyrocms-streams.git
pyrocms-logs 	git@github.com:LorenzoGarcia/pyrocms-logs.git

### Adding remotes

git remote add pyrocms git@github.com:pyrocms/pyrocms.git
git remote fetch pyrcms
git checkout -b pyrocms pyrocms/2.2/develop
git read-tree --prefix=www/dev/2.2/ -u pyrocms

git checkout master
git merge --squash -s subtree --no-commit pyrocms

## VM

set pyrocms-vm/ansible/group_vars/all
