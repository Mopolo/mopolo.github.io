# Executables
PHP = php
NODE = node
NPM = npm
VALET = valet
COMPOSER = $(PHP) composer

# Misc
.DEFAULT_GOAL = help
.PHONY        = help build up start down logs sh composer vendor sf cc

## —— Makefile —————————————————————————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— DEV ——————————————————————————————————————————————————————————————
dev-setup: ## Install dependencies
	@$(COMPOSER) install
	@$(NPM) install

dev-watch: ## Start watching assets
	@$(NPM) run watch

dev-build: ## Compile assets in DEV mode
	@$(NPM) run dev

dev-link: ## links the project to portfolio.test
	@$(VALET) link portfolio

## —— PROD ——————————————————————————————————————————————————————————————
prod-setup: ## Install vendor dependencies
	@$(COMPOSER) install --prefer-dist --no-interaction
	@$(NPM) ci

prod-build: ## Compile assets in DEV mode
	@$(NPM) run prod
	$(PHP) bin/build.php
	$(PHP) bin/thumbnails.php
	cp -R public/css docs
	cp -R public/img docs
	cp CNAME docs
	cp public/favicon.ico docs
	cp public/favicon-16x16.png docs
	cp public/favicon-32x32.png docs
	cp public/favicon-96x96.png docs

## —— QA ——————————————————————————————————————————————————————————————
qa: ## Run code quality tools
	@$(PHP) vendor/bin/psalm
