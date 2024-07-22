# start-air.sh

dlv --listen=:40000 --headless=true --api-version=2 --accept-multiclient exec ./tmp/main & air
