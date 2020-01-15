<template>
    <ais-instant-search :search-client="searchClient" index-name="package_name">
        <ais-search-box placeholder="Owner Name / Package Name " class="searchbox" />
        <br><br>
        <ais-hits>
            <a :href="item.package_url" target="_blank" class="flex align-middle" slot="item" slot-scope="{ item }">
                <img class="w-10 h-10 rounded-full mr-4 " :src="item.owner_avatar_url" :alt="item.owner">
                <span class="leading-3 mt-2">{{ item.owner }}</span>
                <span class="ml-6 mt-2 hidden sm:block">{{ item.owner }} / {{ item.package_name }}</span>
            </a>
        </ais-hits>
        <div class="pagination"><ais-pagination /></div>
    </ais-instant-search>
</template>

<script>
    import algoliasearch from 'algoliasearch/lite';
    import 'instantsearch.css/themes/algolia-min.css';

    export default {
        data() {
            return {
                searchClient: algoliasearch(
                    process.env.MIX_ALGOLIA_APP_ID,
                    process.env.MIX_ALGOLIA_SECRET_SEARCH_ONLY
                ),
            };
        },
    };
</script>

<style lang="scss">
    .ais-SearchBox-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding: .3rem 1.7rem;
        width: 100%;
        position: relative;
        background-color: #fff;
        border: 1px solid #c4c8d8;
        border-radius: 5px;
        padding: 1rem;
        padding-left: 40px;
    }
    .ais-Hits-item, .ais-InfiniteHits-item, .ais-InfiniteResults-item, .ais-Results-item {
        width: 100%;
        background: #fff;
        box-shadow: none;
        margin-top: 0px;
        border-radius: 5px;
        margin-bottom: 3px;
        padding: 0.5rem;
    }

    .pagination {
        margin-top: 30px;
    }

    .searchbox {
        position: relative;

        &:after {
            content: "";
            position: absolute;
            right: 40px;
            top: 19px;
            width: 100px;
            height: 20px;
            background: url('/img/search-by-algolia.png') no-repeat center;
            background-size: contain;
        }

    }

    .ais-SearchBox-reset {
        right: .7rem;
    }

    .ais-SearchBox-submit {
        left: .8rem;
    }

    .ais-Pagination-link {
        background: #fff;
    }

    @media only screen and (max-width: 638px)  {
        .searchbox {
            &:after {
                background: url('/img/algolia.png') no-repeat center;
                background-size: contain;
                right: 0px;
                top: 15px;
            }
        }
        .ais-SearchBox-input {
            font-size: 14px;
        }

        .ais-Hits-item, .ais-InfiniteHits-item, .ais-InfiniteResults-item, .ais-Results-item {
            font-size: 14px;
        }
    }

</style>
