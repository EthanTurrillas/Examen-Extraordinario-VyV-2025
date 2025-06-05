.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t examen-extraordinario-vyv-2025 .

build-container:
	docker run -dt --name examen-extraordinario-vyv-2025 -v .:/540/ExamenExtraordinarioVyV2025 examen-extraordinario-vyv-2025
	docker exec examen-extraordinario-vyv-2025 composer install

start:
	docker start examen-extraordinario-vyv-2025

test: start
	docker exec examen-extraordinario-vyv-2025 ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it examen-extraordinario-vyv-2025 /bin/bash

stop:
	docker stop examen-extraordinario-vyv-2025

clean: stop
	docker rm examen-extraordinario-vyv-2025
	rm -rf vendor
