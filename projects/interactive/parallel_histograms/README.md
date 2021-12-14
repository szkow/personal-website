# Tiny Parallel Histogram Plots

The visualization can be found [here](http://april.rosz.net/projects/interactive/parallel_histograms/demo.php),
and if you're reading this document, you've already found the source code for it.

## Building

Nothing is required to build this project since it is hosted on my website.
The only requirement is an up-to-date browser.

## Usage

The methods of interaction are the same as Bok et al.'s (see below). Here are some of their instructions:

> *Select the pivot attribute by clicking the label below the histogram.
>
> *Brush on axis of histograms to filter items
>
> Control visual components of the histogram.
> - Change the order of attributes by dragging the label of the histogram.

I have added a slider to control the width of the rendered chart (aspect ratio is fixed at 3:1).
Below that slider are two checkboxes to control whether or not to use two of the three design
choices I made (see report for details).

## References

The webpage was built with JavaScript and the [D3](https://d3js.org/) library.
Code for the original visualization was taken and modified from Bok et al. Their implementation
can be found [here](https://bokjinwook.github.io/ParallelHistogramPlotDemo/) and the
paper [here](http://hcil.snu.ac.kr/system/publications/pdfs/000/000/148/original/TVCG3038446.pdf?1606565389).
