#!/bin/bash

DOCKER_COMPOSE_FILE="docker-compose.yml"

docker-compose up --build
# Provide feedback
echo "Docker Compose build complete. Your application is running at http://127.0.0.1:5173"

