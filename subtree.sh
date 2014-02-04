#!/bin/bash

MY_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

source $MY_DIR/template.sh

### pyrocms

#### Adding subtree

info "pyrocms | Add remote"
git remote add -f pyrocms git@github.com:pyrocms/pyrocms.git
success

info "pyrocms | Add subtree"
git subtree add --prefix www/dev/2.2 pyrocms/2.2/develop --squash
success

info "pyrocms | Fetch"
git fetch pyrocms 2.2/develop
success

info "pyrocms | Pull subtree"
git subtree pull --prefix www/dev/2.2 pyrocms 2.2/develop --squash
success

#### Contributing back to upstream

info "pyrocms | Add upstream"
git remote add pyrocms-upstream git@github.com:LorenzoGarcia/pyrocms.git
success

info "pyrocms | Push subtree to upstream"
git subtree push --prefix=www/dev/2.2/ pyrocms-upstream 2.2/develop
success


### pyrocms-streams

#### Adding subtree

info "pyrocms-streams | Add remote"
git remote add -f pyrocms-streams git@github.com:LorenzoGarcia/pyrocms-streams.git
success

info "pyrocms-streams | Add subtree"
git subtree add --prefix www/dev/2.2/addons/shared_addons/libraries/streams pyrocms-streams master --squash
success

info "pyrocms-streams | Fetch"
git fetch pyrocms-streams master
success

info "pyrocms-streams | Pull subtree"
git subtree pull --prefix www/dev/2.2/addons/shared_addons/libraries/streams pyrocms-streams master --squash
success

#### Contributing back to upstream

info "pyrocms-streams | Push subtree to upstream"
git subtree push --prefix=www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master
success


### pyrocms-logs

#### Adding subtree

info "pyrocms-logs | Add remote"
git remote add -f pyrocms-logs git@github.com:LorenzoGarcia/pyrocms-logs.git
success

info "pyrocms-logs | Add subtree"
git subtree add --prefix www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master --squash
success

info "pyrocms-logs | Fetch"
git fetch pyrocms-logs master
success

info "pyrocms-logs | Pull subtree"
git subtree pull --prefix www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master --squash
success

#### Contributing back to upstream

info "pyrocms-logs | Push subtree to upstream"
git subtree push --prefix=www/dev/2.2/addons/shared_addons/modules/logs pyrocms-logs master
success

### pyrocms-bootstrap

#### Adding subtree

info "pyrocms-bootstrap | Add remote"
git remote add -f pyrocms-bootstrap git@github.com:LorenzoGarcia/pyrocms-bootstrap.git
success

info "pyrocms-bootstrap | Add subtree"
git subtree add --prefix www/dev/2.2/addons/shared_addons/themes/bootstrap pyrocms-bootstrap master --squash
success

info "pyrocms-bootstrap | Fetch"
git fetch pyrocms-bootstrap master
success

info "pyrocms-bootstrap | Pull subtree"
git subtree pull --prefix www/dev/2.2/addons/shared_addons/themes/bootstrap pyrocms-bootstrap master --squash
success

#### Contributing back to upstream

info "pyrocms-bootstrap | Push subtree to upstream"
git subtree push --prefix=www/dev/2.2/addons/shared_addons/themes/bootstrap pyrocms-bootstrap master
success
