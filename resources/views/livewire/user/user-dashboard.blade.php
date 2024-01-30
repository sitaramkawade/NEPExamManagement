<div>
  <!-- Main content -->
  <div>
    <!-- Content header -->
    <x-dashboard.header heading="User Dashboard" />

    <!-- Content -->
    <div class="mt-2">
      <!-- State cards -->
      <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
        <x-dashboard.state-card title="Users" count="50,021" groth="+2.6%">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </x-dashboard.state-card>

        <x-dashboard.state-card title="Value" count="$30,000" groth="+3.1%">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </x-dashboard.state-card>

        <x-dashboard.state-card title="Orders" count="45,021" groth="+4.4%">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </x-dashboard.state-card>

        <x-dashboard.state-card title="Tickets" count="20,516" groth="+3.1%">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
        </x-dashboard.state-card>
      </div>

      <!-- Charts -->
      <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <div class="col-span-2">
          <!-- Bar chart card -->
          <x-dashboard.bar-chart-card name="Bar Chart" toggle="Last Year">
            <canvas id="barChart"></canvas>
          </x-dashboard.bar-chart-card>
        </div>
        <div>
          <!-- Doughnut chart card -->
          <x-dashboard.doughnut-chart-card name="Doughnut Chart" toggle="Include Seb">
            <canvas id="doughnutChart"></canvas>
          </x-dashboard.doughnut-chart-card>
        </div>

      </div>

      <!-- Two grid columns -->
      <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
        <div class="col-span-1">
          <!-- Active users chart -->
          <x-dashboard.active-user-chart name="Active users right now" lable="Users" id="usersCount" count="0">
            <canvas id="activeUsersChart"></canvas>
          </x-dashboard.active-user-chart>
        </div>
        <div class="col-span-2">
          <!-- Line chart card -->
          <x-dashboard.line-chart-card name="Line Chart" toggle=" ">
            <canvas id="lineChart"></canvas>
          </x-dashboard.line-chart-card>
        </div>
      </div>
    </div>
  </div>
  @section('scripts')
    <script>
      const updateBarChart = (on) => {
        const data = {
          data: randomData(),
          backgroundColor: 'rgb(207, 250, 254)',
        }
        if (on) {
          barChart.data.datasets.push(data)
          barChart.update()
        } else {
          barChart.data.datasets.splice(1)
          barChart.update()
        }
      }

      const updateDoughnutChart = (on) => {
        const data = random()
        const color = 'rgb(207, 250, 254)'
        if (on) {
          doughnutChart.data.labels.unshift('Seb')
          doughnutChart.data.datasets[0].data.unshift(data)
          doughnutChart.data.datasets[0].backgroundColor.unshift(color)
          doughnutChart.update()
        } else {
          doughnutChart.data.labels.splice(0, 1)
          doughnutChart.data.datasets[0].data.splice(0, 1)
          doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
          doughnutChart.update()
        }
      }

      const updateLineChart = () => {
        lineChart.data.datasets[0].data.reverse()
        lineChart.update()
      }
      const random = (max = 100) => {
        return Math.round(Math.random() * max) + 20
      }

      const randomData = () => {
        return [
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
          random(),
        ]
      }

      const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

      const cssColors = (color) => {
        return getComputedStyle(document.documentElement).getPropertyValue(color)
      }

      const getColor = () => {
        return window.localStorage.getItem('color') ?? 'cyan'
      }

      const colors = {
        primary: cssColors(`--color-${getColor()}`),
        primaryLight: cssColors(`--color-${getColor()}-light`),
        primaryLighter: cssColors(`--color-${getColor()}-lighter`),
        primaryDark: cssColors(`--color-${getColor()}-dark`),
        primaryDarker: cssColors(`--color-${getColor()}-darker`),
      }

      const barChart = new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
          labels: months,
          datasets: [{
            data: randomData(),
            backgroundColor: colors.primary,
            hoverBackgroundColor: colors.primaryDark,
          }, ],
        },
        options: {
          scales: {
            yAxes: [{
              gridLines: false,
              ticks: {
                beginAtZero: true,
                stepSize: 50,
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 10,
              },
            }, ],
            xAxes: [{
              gridLines: false,
              ticks: {
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 5,
              },
              categoryPercentage: 0.5,
              maxBarThickness: '10',
            }, ],
          },
          cornerRadius: 2,
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
        },
      })

      const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
          labels: ['Oct', 'Nov', 'Dec'],
          datasets: [{
            data: [random(), random(), random()],
            backgroundColor: [colors.primary, colors.primaryLighter, colors.primaryLight],
            hoverBackgroundColor: colors.primaryDark,
            borderWidth: 0,
            weight: 0.5,
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: 'bottom',
          },

          title: {
            display: false,
          },
          animation: {
            animateScale: true,
            animateRotate: true,
          },
        },
      })

      const activeUsersChart = new Chart(document.getElementById('activeUsersChart'), {
        type: 'bar',
        data: {
          labels: [...randomData(), ...randomData()],
          datasets: [{
            data: [...randomData(), ...randomData()],
            backgroundColor: colors.primary,
            borderWidth: 0,
            categoryPercentage: 1,
          }, ],
        },
        options: {
          scales: {
            yAxes: [{
              display: false,
              gridLines: false,
            }, ],
            xAxes: [{
              display: false,
              gridLines: false,
            }, ],
            ticks: {
              padding: 10,
            },
          },
          cornerRadius: 2,
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
          tooltips: {
            prefix: 'Users',
            bodySpacing: 4,
            footerSpacing: 4,
            hasIndicator: true,
            mode: 'index',
            intersect: true,
          },
          hover: {
            mode: 'nearest',
            intersect: true,
          },
        },
      })

      const lineChart = new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
          labels: months,
          datasets: [{
            data: randomData(),
            fill: false,
            borderColor: colors.primary,
            borderWidth: 2,
            pointRadius: 0,
            pointHoverRadius: 0,
          }, ],
        },
        options: {
          responsive: true,
          scales: {
            yAxes: [{
              gridLines: false,
              ticks: {
                beginAtZero: false,
                stepSize: 50,
                fontSize: 12,
                fontColor: '#97a4af',
                fontFamily: 'Open Sans, sans-serif',
                padding: 20,
              },
            }, ],
            xAxes: [{
              gridLines: false,
            }, ],
          },
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
          tooltips: {
            hasIndicator: true,
            intersect: false,
          },
        },
      })

      let randomUserCount = 0

      const usersCount = document.getElementById('usersCount')

      const fakeUsersCount = () => {
        randomUserCount = random()
        activeUsersChart.data.datasets[0].data.push(randomUserCount)
        activeUsersChart.data.datasets[0].data.splice(0, 1)
        activeUsersChart.update()
        usersCount.innerText = randomUserCount
      }

      setInterval(() => {
        fakeUsersCount()
      }, 1000)
    </script>
  @endsection
</div>
