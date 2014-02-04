# PyroCMS Environment

## Install git.subtree

sudo chmod +x /usr/share/doc/git/contrib/subtree/git-subtree.sh

sudo ln -s /usr/share/doc/git/contrib/subtree/git-subtree.sh /usr/lib/git-core/git-subtree

## Remotes

pyrocms 		git@github.com:pyrocms/pyrocms.git
pyrocms-streams	git@github.com:LorenzoGarcia/pyrocms-streams.git
pyrocms-logs 	git@github.com:LorenzoGarcia/pyrocms-logs.git

### Adding remotes

git remote add -f pyrocms git@github.com:pyrocms/pyrocms.git

git subtree add --prefix www/dev/2.2 pyrocms/2.2/develop --squash

git fetch pyrocms 2.2/develop

git subtree pull --prefix www/dev/2.2 pyrocms/2.2/develop --squash

###

## VM

set pyrocms-environment/ansible/group_vars/all
