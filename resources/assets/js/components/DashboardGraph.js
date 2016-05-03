import Vue from 'vue';
import Chart from 'chart.js';

export default Vue.extend({
    template: `
        <div>
            <canvas width="800px" height="200px" v-el:canvas></canvas>
        </div>
    `,

    props: ['keys', 'visitors', 'pageviews'],

    data() {
        return {
            legend: ''
        };
    },

    ready() {
        this.render({
            labels: this.keys,
            datasets: [
                {
                    label: "Last month unique visitors",
                    data: this.visitors
                },
                {
                    label: "Last month page views",
                    data: this.pageviews
                }
            ]
        });
    },

    methods: {
        render(data) {
            const chart = new Chart.Line(
                this.$els.canvas.getContext('2d'),
                {data}
            );

            this.legend = chart.generateLegend();
        }
    }
});