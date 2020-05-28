<template>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th v-for="column in columns" :key="column.key"
                        style="cursor:pointer;">{{column.label}}
                    </th>
                    <th style="width: 140px" v-if="actions.length > 0">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key="item.id">
                    <td class="align-middle" v-for="column in columns">{{ item[column.key] }}</td>
                    <td v-if="actions.length > 0" class="align-middle" style="width: 150px">
                        <div>
                            <a
                                type="button"
                                v-for="action in actions"
                                :title=action.title
                                v-bind:href="action.link ? (action.link.prefix + item[action.link.attribute] + (action.link.postfix || '')) : ''"
                                :class="action.class"
                                v-html="action.label"
                                onclick="this.blur();"
                            >{{action.label}}</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['config'],
        data() {
            let res = this.loadData(this.config);

            if (res) {
                const data    = res.data || {};
                const columns = res.columns || {};
                const actions = res.actions || {};

                return {
                    data,
                    columns,
                    actions
                }
            }
        },
        methods: {
            loadData(data) {
                return JSON.parse(data);
            }
        }
    };
</script>
