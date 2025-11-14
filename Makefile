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

watchcss:
	npx @tailwindcss/cli -i ./public/css/input.css -o ./public/css/output.css --watch

serve:
	php spark serve

.PHONY: composeup composedown migrate serve
