/* ------------------------------------------------------------------------------
 *
 *  # D3.js - grouped bar chart
 *
 *  Demo d3.js grouped bar chart setup with .csv data source
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {

    // Initialize chart
    barGrouped('#d3-bar-grouped', 400);

    // Chart setup
    function barGrouped(element, height) {


        // Basic setup
        // ------------------------------

        // Define main variables
        var d3Container = d3.select(element),
            margin = {top: 5, right: 10, bottom: 20, left: 40},
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = height - margin.top - margin.bottom - 5;



        // Construct scales
        // ------------------------------

        // Horizontal
        var x0 = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1);

        var x1 = d3.scale.ordinal()
            .range([0, width]);

        // Vertical
        var y = d3.scale.linear()
            .range([height, 0]);

        // Colors
        var color = d3.scale.ordinal()
        .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);



        // Create axes
        // ------------------------------

        // Horizontal
        var xAxis = d3.svg.axis()
            .scale(x0)
            .orient("bottom");

        // Vertical
        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            .tickFormat(d3.format(".2s"));



        // Create chart
        // ------------------------------

        // Add SVG element
        var container = d3Container.append("svg");

        // Add SVG group
        var svg = container
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


        // Load data
        // ------------------------------

        var data = [
        {
        "Groups": "A170",
        "Level 1": 1,
        "Level 2": 22,
        "Level 3": 22,
        "Level 4": 1
        },
        {
        "Groups": "A220",
        "Level 1": 2,
        "Level 2": 1,
        "Level 3": 1,
        "Level 4": 1
        },
        {
        "Groups": "A240",
        "Level 1": 6,
        "Level 2": 11,
        "Level 3": 18,
        "Level 4": 13
        },
        {
        "Groups": "A250",
        "Level 1": 1,
        "Level 2": 1,
        "Level 3": 1,
        "Level 4": 1
        },
        {
        "Groups": "A260",
        "Level 1": 1,
        "Level 2": 1,
        "Level 3": 1,
        "Level 4": 1
        },
        {
        "Groups": "A270",
        "Level 1": 3,
        "Level 2": 3,
        "Level 3": 10,
        "Level 4": 29
        },
        {
        "Groups": "B431",
        "Level 1": 10,
        "Level 2": 10,
        "Level 3": 0,
        "Level 4": 0
        },
        {
        "Groups": "E200",
        "Level 1": 23,
        "Level 2": 4,
        "Level 3": 0,
        "Level 4": 0
        },
        {
        "Groups": "B430",
        "Level 1": 5,
        "Level 2": 0,
        "Level 3": 0,
        "Level 4": 5
        },
        {
        "Groups": "F230",
        "Level 1": 12,
        "Level 2": 3,
        "Level 3": 3,
        "Level 4": 24
        },
        {
        "Groups": "B441",
        "Level 1": 12,
        "Level 2": 0,
        "Level 3": 0,
        "Level 4": 0
        },
        {
        "Groups": "A230",
        "Level 1": 0,
        "Level 2": 1,
        "Level 3": 1,
        "Level 4": 1
        },
        {
        "Groups": "D220",
        "Level 1": 0,
        "Level 2": 19,
        "Level 3": 19,
        "Level 4": 0
        }
        ]

        var margin = {top: 20, right: 20, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

        var x0 = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

        var x1 = d3.scale.ordinal();

        var y = d3.scale.linear()
        .range([height, 0]);

        var color = d3.scale.ordinal()
        .range(["#C4F0FF", "#E8D1FF" , "#FFC4C4", "#F6FFC4"]);

        var xAxis = d3.svg.axis()
        .scale(x0)
        .orient("bottom");

        var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left")
        .tickFormat(d3.format(".2s"));

        var svg = d3.select("#chart-group").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        var ageNames = d3.keys(data[0]).filter(function(key) { return key !== "Groups"; });

        data.forEach(function(d) {
        d.ages = ageNames.map(function(name) { return {name: name, value: +d[name]}; });
        });

        x0.domain(data.map(function(d) { return d.Groups; }));
        x1.domain(ageNames).rangeRoundBands([0, x0.rangeBand()]);
        y.domain([0, d3.max(data, function(d) { return d3.max(d.ages, function(d) { return d.value; }); })]);

        svg.append("g")
          .attr("class", "x axis")
          .attr("transform", "translate(0," + height + ")")
          .call(xAxis);

        svg.append("g")
          .attr("class", "y axis")
          .call(yAxis)
          .append("text")
          .attr("transform", "rotate(-90)")
          .attr("y", 6)
          .attr("dy", ".71em")
          .style("text-anchor", "end")
          .text("Population");

        var state = svg.selectAll(".groups")
          .data(data)
          .enter().append("g")
          .attr("class", "groups")
          .attr("transform", function(d) { return "translate(" + x0(d.Groups) + ",0)"; });

        state.selectAll("rect")
          .data(function(d) { return d.ages; })
          .enter().append("rect")
          .attr("width", x1.rangeBand())
          .attr("x", function(d) { return x1(d.name); })
          .attr("y", function(d) { return y(d.value); })
          .attr("height", function(d) { return height - y(d.value); })
          .style("fill", function(d) { return color(d.name); });

        var legend = svg.selectAll(".legend")
          .data(ageNames.slice().reverse())
          .enter().append("g")
          .attr("class", "legend")
          .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

        legend.append("rect")
          .attr("x", width - 18)
          .attr("width", 18)
          .attr("height", 18)
          .style("fill", color);

        legend.append("text")
          .attr("x", width - 24)
          .attr("y", 9)
          .attr("dy", ".35em")
          .style("text-anchor", "end")
          .text(function(d) { return d; });



        // Resize chart
        // ------------------------------

        // Call function on window resize
        $(window).on('resize', resize);

        // Call function on sidebar width change
        $('.sidebar-control').on('click', resize);

        // Resize function
        // 
        // Since D3 doesn't support SVG resize by default,
        // we need to manually specify parts of the graph that need to 
        // be updated on window resize
        function resize() {

            // Layout variables
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


            // Layout
            // -------------------------

            // Main svg width
            container.attr("width", width + margin.left + margin.right);

            // Width of appended group
            svg.attr("width", width + margin.left + margin.right);


            // Axes
            // -------------------------

            // Horizontal ranges
            x0.rangeRoundBands([0, width], .1);
            x1.rangeRoundBands([0, x0.rangeBand()]);

            // Horizontal axis
            svg.selectAll('.d3-axis-horizontal').call(xAxis);


            // Chart elements
            // -------------------------

            // Bar group
            svg.selectAll('.bar-group').attr("transform", function(d) { return "translate(" + x0(d.State) + ",0)"; });

            // Bars
            svg.selectAll('.d3-bar').attr("width", x1.rangeBand()).attr("x", function(d) { return x1(d.name); });

            // Legend
            svg.selectAll(".d3-legend text").attr("x", width - 24);
            svg.selectAll(".d3-legend rect").attr("x", width - 18);
        }
    }
});
