import React from 'react'
import Head from '../components/Head.js'
import Header from '../components/Header.js'
import FadeInText from '../components/FadeInText.js'
import FadeInLogo from '../components/FadeInLogo.js'
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker
} from 'react-google-maps'
import Footer from '../components/Footer.js'
import RelatedCard from '../components/RelatedCard.js'
import { Redux, ReactNative, Electron } from '../components/CardData.js'

const MyMapComponent = withScriptjs(
  withGoogleMap(props => (
    <GoogleMap
      defaultZoom={18}
      defaultCenter={{ lat: props.lat, lng: props.lng }}
    >
      {props.isMarkerShown && (
        <Marker position={{ lat: props.lat, lng: props.lng }} />
      )}
    </GoogleMap>
  ))
)

export default class Index extends React.Component {
  render() {
    return (
      <div>
        <Head />
        <Header />
        <div
          style={{
            width: '100%',
            height: 770,
            backgroundImage:
              "url('static/img/https___www.pakutaso.com_shared_img_thumb_kumakichi0221008.jpg')",
            backgroundSize: '100% 100%'
          }}
        >
          <div
            style={{
              width: '100%',
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'center',
              paddingTop: 200
            }}
          >
            <FadeInText />
          </div>
          <div
            style={{
              width: '100%',
              display: 'flex',
              justifyContent: 'center'
            }}
          >
            <FadeInLogo />
          </div>
        </div>

        <div style={{ background: '#2E2E2E' }}>
          <div
            style={{
              height: 90
            }}
          >
            <h1
              style={{
                color: 'white',
                paddingTop: 40,
                textAlign: 'center',
                fontSize: 45
              }}
            >
              Related
            </h1>
          </div>
          <div
            style={{
              display: 'flex',
              justifyContent: 'center',
              marginTop: 50
            }}
          >
            <RelatedCard
              detail={Redux.detail}
              title={Redux.title}
              image={Redux.image}
              description={Redux.description}
            />
            <RelatedCard
              detail={ReactNative.detail}
              title={ReactNative.title}
              image={ReactNative.image}
              description={ReactNative.description}
            />
            <RelatedCard
              detail={Electron.detail}
              title={Electron.title}
              image={Electron.image}
              description={Electron.description}
            />{' '}
          </div>
        </div>

        <div
          style={{
            display: 'flex',
            justifyContent: 'center',
            backgroundImage:
              "url('static/img/https___www.pakutaso.com_shared_img_thumb_MIYADSC_3425-3.jpg')",
            backgroundSize: '100% 100%'
          }}
        >
          <div
            style={{
              width: '32%',
              background: 'rgba(65,105, 225,0.3)',
              lineHeight: 2,
              padding: 50,
              color: '#d3d3d3'
            }}
          >
            <h1>What's Next.js</h1>
            <p>
              IT’S A FRAMEWORK Next.js is opinionated and provides structure for
              how you build your app. Like Rails, the file-system is often the
              API. You name your file something special and put it in a special
              directory, and it Just Works. In this way, Next.js feels like a
              framework.
            </p>
          </div>
          <div
            style={{
              height: 600,
              width: '36%'
            }}
          />
          <div
            style={{
              width: '32%',
              background: 'rgba(65,105, 225,0.3)',
              lineHeight: 2,
              padding: 50,
              color: '#d3d3d3'
            }}
          >
            <h1>What's React</h1>
            <p>
              Declarative React makes it painless to create interactive UIs.
              Design simple views for each state in your application, and React
              will efficiently update and render just the right components when
              your data changes. Declarative views make your code more
              predictable and easier to debug.
            </p>
          </div>
        </div>

        <div
          style={{
            height: 400,
            background: '#2E2E2E'
          }}
        >
          <h1 style={{ color: 'white', padding: 20 }}>Place</h1>
          <MyMapComponent
            isMarkerShown
            lat={37.3874}
            lng={-122.0575}
            googleMapURL="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry,drawing,places&key=AIzaSyBzo2Me32_0ofJ4A3dB8RqO0SLh9zxvk_o"
            loadingElement={<div style={{ height: '100%' }} />}
            containerElement={<div style={{ height: '420px' }} />}
            mapElement={<div style={{ height: '100%' }} />}
          />
        </div>

        <Footer />
      </div>
    )
  }
}
