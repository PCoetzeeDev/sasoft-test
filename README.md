# Test Project for SA Soft

### How to run this app
1. First clone the repo


    git clone git@github.com:PCoetzeeDev/sasoft-test.git && cd sasoft-test

2. Add the following domain in your hosts file pointing to localhost, like so:


    127.0.0.1       sasofttest.local        sasofttest


4. Go into the docker folder, run the env.sh script


    cd docker && ./env.sh

3. Next, run the up.sh script which should build and start the app


    ./up.sh

That should be it!

### Other useful scripts in /docker
    seed.sh
Run the db seed and populates it with random data

    test.sh
Run the automated tests - Will clear out the db currently!

    log.sh
Attach to the app and watch the logs

    down.sh
Bring the app down

