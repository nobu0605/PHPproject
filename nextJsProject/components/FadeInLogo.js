import React from 'react'
import { VelocityTransitionGroup } from 'velocity-react'

export default class FadeInLogo extends React.Component {
  constructor() {
    super()

    this.state = {
      children: [
        <img
          src="static/img/nextjs-white-logo.svg"
          style={{ width: '30%', height: '100%' }}
        />,
        <img
          src="static/img/ReactJS.png"
          style={{ width: '25%', height: '80%', marginLeft: 60 }}
        />
      ]
    }
  }
  render() {
    return (
      <VelocityTransitionGroup
        style={{
          display: 'flex',
          justifyContent: 'center',
          height: 200,
          marginTop: 30
        }}
        runOnMount={true}
        enter={{
          animation: 'fadeIn',
          stagger: 100
        }}
        leave={{
          animation: 'fadeOut',
          stagger: 100
        }}
      >
        {this.state.children}
      </VelocityTransitionGroup>
    )
  }
}
