composeup:
	docker compose up -d

composedown:
	docker compose down

postgres:
	docker exec -it postgres_battery psql -U yehezkiel1086 -b battery_inventory

migrate:
	php spark migrate

migratestatus:
	php spark migrate:status

migraterollback:
	php spark migrate:rollback

migraterefresh:
	php spark migrate:refresh

seed:
	php spark db:seed CategorySeeder 
	php spark db:seed BatterySeeder 
	php spark db:seed ShipmentSeeder 
	php spark db:seed InventorySeeder

watchcss:
	npx @tailwindcss/cli -i ./public/css/input.css -o ./public/css/output.css --watch

dev:
	php spark serve

.PHONY: composeup composedown migrate dev
