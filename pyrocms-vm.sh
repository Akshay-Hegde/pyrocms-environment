git remote add -f pyrocms-vm git@github.com:LorenzoGarcia/pyrocms-vm.git

git subtree add --prefix vm pyrocms-vm master --squash

git fetch pyrocms-vm master

git subtree pull --prefix vm pyrocms-vm master --squash

git subtree push --prefix=vm pyrocms-vm master
