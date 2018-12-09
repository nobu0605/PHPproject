// Dependencies
import React from 'react'
import ReactDOM from 'react-dom'
import { VelocityTransitionGroup } from 'velocity-react'

// Define <Greet />
export default class FadeInText extends React.Component {
  constructor() {
    super()

    this.state = {
      children: [
        <h1
          style={{
            color: 'white',
            fontSize: 80
          }}
        >
          Welcom to mysite
        </h1>
      ]
    }
  }
  render() {
    return (
      <VelocityTransitionGroup
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
