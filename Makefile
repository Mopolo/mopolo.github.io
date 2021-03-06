help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  dev-setup                        to setup dev environment"
	@echo "  dev-watch                        to start dev mode"
	@echo "  dev-link                         to link the project using Valet."
	@echo "  prod-setup                       to install dependencies for production"
	@echo "  prod-build                       to create a production build"

dev-setup:
	composer install
	yarn

dev-watch:
	yarn watch

dev-build:
	yarn dev

dev-link:
	valet link portfolio

psalm:
	php vendor/bin/psalm

prod-setup:
	composer install --prefer-dist --no-interaction --no-suggest
	yarn install --non-interactive

prod-build:
	yarn prod
	php bin/build.php
	php bin/thumbnails.php
	cp -R public/css docs
	cp -R public/img docs
	cp CNAME docs
	cp public/favicon.ico docs
	cp public/favicon-16x16.png docs
	cp public/favicon-32x32.png docs
	cp public/favicon-96x96.png docs
