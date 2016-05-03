import Vue from 'vue';
import Chart from 'chart.js';

export default Vue.extend({
    template: `
        <div>
            <canvas width="800px" height="200px" v-el:canvas></canvas>
        </div>
    `,

    props: ['keys', 'values'],

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
                    label: "Visitors last 90 days",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values
                }
            ]
        });
    },

    methods: {
        render(data) {
            const chart = new Chart.Line(
                this.$els.canvas.getContext('2d'),
                { data }
            );

            this.legend = chart.generateLegend();
        }
    }
});