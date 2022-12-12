# Shoes Store

## Getting Started

**Pre-requirements:**

- PHP v8.1 or above
- MySQL Database
- Composer
- Node v16+

### Installation
1. Clone the repository and `cd` into the directory
    ```shell
    git clone https://github.com/koyoi-dev/shoes-store-v2
    cd shoes-store-v2
    ```
2. Install packages
    ```shell
    composer install --ignore-platform-reqs
    npm install
    ```
3. Copy `.env.example` to `.env`
4. Set `FILESYSTEM_DISK` in `.env` to `public`

### Developing
There can be 2 ways to run the project based on the needs:
1. Running the project while watching for assets (css, js) changes.
2. Only serving the pages.

If case **1**:
- To compile the assets and watch for changes
    ```shell
    npm run dev
    ```
- To serve pages (run the webserver)
    ```shell
    php artisan serve
    ```
**Make sure to run the above commands simultaneously on different terminals!**

If case **2**:

First we need to build the assets
```shell
npm run build
```
Then we can serve the pages
```shell
php artisan serve
```
