# PyroCMS Environment

## Install git.subtree

sudo chmod +x /usr/share/doc/git/contrib/subtree/git-subtree.sh

sudo ln -s /usr/share/doc/git/contrib/subtree/git-subtree.sh /usr/lib/git-core/git-subtree

## Remotes

### pyrocms

#### Adding remotes

git remote add -f pyrocms git@github.com:pyrocms/pyrocms.git

git subtree add --prefix www/dev/2.2 pyrocms/2.2/develop --squash

git fetch pyrocms 2.2/develop

git subtree pull --prefix www/dev/2.2 pyrocms/2.2/develop --squash

#### Contributing back to upstream

git remote add pyrocms-upstream git@github.com:LorenzoGarcia/pyrocms.git

git subtree push --prefix=www/dev/2.2/ pyrocms 2.2/develop


### pyrocms-streams

#### Adding remotes

git remote add -f pyrocms-streams git@github.com:LorenzoGarcia/pyrocms-streams.git

git subtree add --prefix www/dev/2.2/addons/shared_addons/libraries/streams pyrocms-streams master --squash

git fetch pyrocms-streams master

git subtree pull --prefix www/dev/2.2/addons/shared_addons/libraries/streams pyrocms-streams master --squash

#### Contributing back to upstream

git subtree push --prefix=www/dev/2.2/addons/shared_addons/libraries/streams pyrocms-streams master


### pyrocms-logs

#### Adding remotes

git remote add -f pyrocms-logs git@github.com:LorenzoGarcia/pyrocms-logs.git

git subtree add --prefix www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master --squash

git fetch pyrocms-logs master

git subtree pull --prefix www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master --squash

#### Contributing back to upstream

git subtree push --prefix=www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master


## VM

set pyrocms-environment/ansible/group_vars/all
