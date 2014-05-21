#!/bin/bash

clear
MY_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

source $MY_DIR/template.sh

function pyrocms-vm {
	info "pyrocms-vm | Add remote"
	git remote add -f pyrocms-vm git@github.com:LorenzoGarcia/pyrocms-vm.git
	info "pyrocms-vm | Add subtree"
	git subtree add --prefix vm pyrocms-vm master --squash
	info "pyrocms-vm | Fetch"
	git fetch pyrocms-vm master
	info "pyrocms-vm | Pull subtree"
	git subtree pull --prefix vm pyrocms-vm master --squash
	info "pyrocms-vm | Push subtree to upstream"
	git subtree push --prefix=vm pyrocms-vm master

	success
}

function pyrocms {
	info "pyrocms | Add remote"
	git remote add -f pyrocms git@github.com:pyrocms/pyrocms.git
	info "pyrocms | Add subtree"
	git subtree add --prefix www/dev/2.2 pyrocms/2.2/develop --squash
	info "pyrocms | Fetch"
	git fetch pyrocms 2.2/develop
	info "pyrocms | Pull subtree"
	git subtree pull --prefix www/dev/2.2 pyrocms 2.2/develop --squash

	success
}

function pyrocms-database {
	info "pyrocms | Add remote"
	git remote add -f pyrocms-database git@github.com:adamfairholm/PyroDatabase.git
	info "pyrocms | Add subtree"
	git subtree add --prefix www/dev/2.2/addons/shared_addons/modules/database pyrocms-database master --squash
	info "pyrocms | Fetch"
	git fetch pyrocms-database master
	info "pyrocms | Pull subtree"
	git subtree pull --prefix www/dev/2.2/addons/shared_addons/modules/database pyrocms-database master --squash

	success
}

function addons {
	info "$2 | Add remote"
	git remote add -f $2 git@github.com:LorenzoGarcia/$2.git
	info "$2 | Add subtree"
	git subtree add --prefix www/dev/2.2/addons/shared_addons/$1 $2 $3 --squash
	info "$2 | Fetch"
	git fetch $2 $3
	info "$2 | Pull subtree"
	git subtree pull --prefix www/dev/2.2/addons/shared_addons/$1 $2 $3 --squash
	info "$2 | Push subtree to upstream"
	git subtree push --prefix=www/dev/2.2/addons/shared_addons/$1 $2 $3

	success
}

function mediawiki {
	info "mediawiki | Add remote"
	git remote add -f mediawiki https://gerrit.wikimedia.org/r/p/mediawiki/core.git
	info "mediawiki | Add subtree"
	git subtree add --prefix www/dev/mediawiki mediawiki master --squash
	info "mediawiki | Fetch"
	git fetch mediawiki master
	info "mediawiki | Pull subtree"
	git subtree pull --prefix www/dev/mediawiki mediawiki master --squash

	success
}

PS3='Please enter your choice: '
options=(
	"ALL"
	"pyrocms-vm"
	"pyrocms"
	"pyrocms-streams"
	"pyrocms-database"
	"pyrocms-faq"
	"pyrocms-logs"
	"pyrocms-robots"
	"pyrocms-bootstrap"
	"mediawiki"
	"Quit"
	)
select opt in "${options[@]}"
do
    case $opt in
        "ALL")
			pyrocms-vm
			pyrocms

			addons libraries/streams pyrocms-streams master

			pyrocms-database

			addons modules/faq pyrocms-faq master
			addons modules/logs pyrocms-logs master
			addons modules/robots pyrocms-robots master

			addons themes/bootstrap pyrocms-bootstrap master

			mediawiki
			break
            ;;
        "pyrocms-vm")
			pyrocms-vm
			break
            ;;
        "pyrocms")
			pyrocms
			break
            ;;
        "pyrocms-streams")
			addons libraries/streams pyrocms-streams master
			break
            ;;
        "pyrocms-database")
			pyrocms-database
			break
            ;;
        "pyrocms-faq")
			addons modules/faq pyrocms-faq master
			break
            ;;
        "pyrocms-logs")
			addons modules/logs pyrocms-logs master
			break
            ;;
        "pyrocms-robots")
			addons modules/robots pyrocms-robots master
			break
            ;;
        "pyrocms-bootstrap")
			addons themes/bootstrap pyrocms-bootstrap master
			break
            ;;
        "mediawiki")
			mediawiki
			break
            ;;
        "Quit")
            break
            ;;
        *) echo invalid option;;
    esac
done
